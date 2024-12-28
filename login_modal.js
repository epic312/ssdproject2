// This script should be included after the page has loaded

// Generate TOTP
function showTotpModal(totp) {
    // Create modal container
    var modal = document.createElement('div');
    modal.style.position = 'fixed';
    modal.style.top = '0';
    modal.style.left = '0';
    modal.style.width = '100%';
    modal.style.height = '100%';
    modal.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
    modal.style.display = 'flex';
    modal.style.alignItems = 'center';
    modal.style.justifyContent = 'center';
    modal.style.zIndex = '9999';

    // Create modal content
    var modalContent = document.createElement('div');
    modalContent.style.backgroundColor = '#fff';
    modalContent.style.padding = '20px';
    modalContent.style.borderRadius = '8px';
    modalContent.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
    modalContent.innerHTML = `
        <h3>Please Verify yourself!</h3>
        <p>Enter the TOTP sent to your email: ${totp}</p>
        <form method="POST" action="">
            <input type="hidden" name="action" value="verify_totp">
            <input type="text" class="fas fa-user" name="totp" placeholder="Enter TOTP" required>
            <button type="submit" class="btn solid"> Verify TOTP</button>
        </form>
    `;

    // Append content to modal
    modal.appendChild(modalContent);
    document.body.appendChild(modal);
}

// Trigger modal function when page loads
window.onload = function() {
    // Get the TOTP from PHP passed through data-attribute or inline JavaScript
    var totp = document.body.getAttribute("data-totp");
    if (totp) {
        showTotpModal(totp);
    }
};
