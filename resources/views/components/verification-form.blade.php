@props(['emailValue' => null])

<div class="mt-4">
    <x-input-error :messages="$errors->get('code')" class="mt-2" style="color:red; font-size:25;" />

    <label class="block text-sm text-gray-700">Verification Code</label>
    <div class="flex items-center gap-2 mt-1">
        <input type="text" name="code" id="code" maxlength="6" placeholder="6-digit code"
               class="flex-1 border rounded px-2 py-1 text-center text-sm" required />
        <button type="button" id="sendCodeBtn"
                class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700 transition">
            Send
        </button>
    </div>
    <p id="delayText" class="text-xs text-gray-500 mt-1"></p>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('sendCodeBtn');
    const emailInput = document.getElementById('email');
    const codeInput = document.getElementById('code');
    const delayText = document.getElementById('delayText');

    const STORAGE_KEYS = {
        email: 'register_email',
        code: 'register_code',
        resendExpiry: 'verification_resend_expiry'
    };

    // --- Load saved inputs
    function loadInputs() {
        if (localStorage.getItem(STORAGE_KEYS.email)) emailInput.value = localStorage.getItem(STORAGE_KEYS.email);
        if (localStorage.getItem(STORAGE_KEYS.code)) codeInput.value = localStorage.getItem(STORAGE_KEYS.code);
    }

    // --- Save inputs
    function saveInputs() {
        localStorage.setItem(STORAGE_KEYS.email, emailInput.value);
        localStorage.setItem(STORAGE_KEYS.code, codeInput.value);
    }

    [emailInput, codeInput].forEach(el => el.addEventListener('input', saveInputs));

    // --- Countdown
    let countdownInterval = null;

    function startCountdown(seconds) {
        let remaining = seconds;
        btn.disabled = true;
        btn.classList.add('opacity-60');
        updateCountdownUI(remaining);

        countdownInterval = setInterval(() => {
            remaining--;
            updateCountdownUI(remaining);
            if (remaining <= 0) {
                clearInterval(countdownInterval);
                btn.disabled = false;
                btn.textContent = 'Resend';
                delayText.textContent = '';
                localStorage.removeItem(STORAGE_KEYS.resendExpiry);
            }
        }, 1000);
    }

    function updateCountdownUI(remaining) {
        btn.textContent = `Resend (${remaining}s)`;
        delayText.textContent = `You can resend in ${remaining}s`;
    }

    function resumeCountdownIfAny() {
        const expiry = localStorage.getItem(STORAGE_KEYS.resendExpiry);
        if (!expiry) return;
        const remainingMs = expiry - Date.now();
        if (remainingMs > 0) startCountdown(Math.ceil(remainingMs / 1000));
        else localStorage.removeItem(STORAGE_KEYS.resendExpiry);
    }

    // --- Send code button click
    btn.addEventListener('click', async () => {
        const email = emailInput.value.trim();
        if (!email) return alert('Please enter your email first.');

        btn.disabled = true;
        btn.textContent = 'Sending...';

        try {
            const res = await fetch('{{ route("verification.send") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email })
            });

            const data = await res.json();

            if (data.success) {
                alert('✅ Verification code sent!');
                const expiry = Date.now() + ((data.secondsLeft || 60) * 1000);
                localStorage.setItem(STORAGE_KEYS.resendExpiry, expiry);
                startCountdown(data.secondsLeft || 60);
            } else if (data.blocked) {
                alert(data.message);
                const expiry = Date.now() + (data.secondsLeft * 1000);
                localStorage.setItem(STORAGE_KEYS.resendExpiry, expiry);
                startCountdown(data.secondsLeft);
            } else {
                alert(data.message || '❌ Failed to send code.');
                btn.disabled = false;
                btn.textContent = 'Send';
            }

        } catch (err) {
            alert('❌ Something went wrong.');
            btn.disabled = false;
            btn.textContent = 'Send';
        }
    });

    loadInputs();
    resumeCountdownIfAny();

    // Multi-tab sync
    window.addEventListener('storage', e => {
        if (e.key === STORAGE_KEYS.resendExpiry && e.newValue) {
            const remainingMs = e.newValue - Date.now();
            if (remainingMs > 0) startCountdown(Math.ceil(remainingMs / 1000));
        }
    });
});
</script>
