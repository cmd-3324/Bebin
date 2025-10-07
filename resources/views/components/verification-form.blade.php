@props(['emailValue' => null])

<div class="mt-4">
<x-input-error :messages="$errors->get('code')" class="mt-2" style="color:red; font-size:25;" />

    <label class="block text-sm text-gray-700">Verification Code</label>
    <div class="flex items-center gap-2 mt-1">
        <input type="text" name="code" id="code" maxlength="6"
               placeholder="6-digit code"
               class="flex-1 border rounded px-2 py-1 text-center text-sm" required>
        <button type="button" id="sendCodeBtn"
                class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700 transition">
            Send
        </button>
    </div>
    <p id="delayText" class="text-xs text-gray-500 mt-1"> </p>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('sendCodeBtn');
    const emailInput = document.getElementById('email');
    const delayText = document.getElementById('delayText');
    let countdown = null;

    btn.addEventListener('click', async () => {
        const email = emailInput.value.trim();
        if (!email) {
            alert('Please enter your email first.');
            return;
        }

        btn.disabled = true;
        btn.textContent = 'Sending...';

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
            alert('Verification code sent!');
            startCountdown(60);
        } else {
            alert(data.message || 'Failed to send code.');
            btn.disabled = false;
            btn.textContent = 'Send';
        }
    });

    function startCountdown(seconds) {
        let remaining = seconds;
        delayText.textContent = `You can resend in ${remaining}s`;
        btn.textContent = `Resend (${remaining}s)`;
        btn.classList.add('opacity-60');
        countdown = setInterval(() => {
            remaining--;
            
            btn.textContent = `Resend (${remaining}s left) `;
            delayText.textContent = `You can resend in ${remaining}s`;
            if (remaining <= 0) {
                clearInterval(countdown);
                delayText.textContent = '';
                btn.textContent = 'Resend';
                btn.disabled = false;
                btn.classList.remove('opacity-60');
            }
        }, 1000);
    }
});
</script>
