document.addEventListener('DOMContentLoaded', () => {
    // FAQ Accordion logic
    const accordions = document.querySelectorAll('.accordion-header');

    accordions.forEach(acc => {
        acc.addEventListener('click', function() {
            const item = this.parentElement;
            const body = item.querySelector('.accordion-body');
            
            // Toggle current item
            const isActive = item.classList.contains('active');
            
            // Close all items
            document.querySelectorAll('.accordion-item').forEach(otherItem => {
                otherItem.classList.remove('active');
                const otherBody = otherItem.querySelector('.accordion-body');
                if(otherBody) otherBody.style.maxHeight = null;
            });

            // If it wasn't active, open it
            if (!isActive) {
                item.classList.add('active');
                body.style.maxHeight = body.scrollHeight + "px";
            }
        });
    });

    // Form logic with basic validation
    const forms = document.querySelectorAll('.form');

    function validEmail(value) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(value.trim());
    }

    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const emailInput = form.querySelector('input[type="email"]');
            const msgContainer = form.nextElementSibling; // Get the specific message container next to this form
            const value = emailInput.value.trim();
            
            msgContainer.innerHTML = ''; // Limpiar mensaje previo
            
            const msgElement = document.createElement('div');
            msgElement.className = 'msg fade-in-up';
            
            if (!validEmail(value)) {
                msgElement.textContent = 'Ingresa un email válido.';
                msgElement.classList.add('error');
                emailInput.focus();
            } else {
                msgElement.textContent = '¡Email válido! Aquí puedes conectar tu base de datos o backend.';
                msgElement.classList.add('success');
            }
            
            msgContainer.appendChild(msgElement);
        });
    });
});
