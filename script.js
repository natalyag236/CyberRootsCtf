document.addEventListener("DOMContentLoaded", () => {
    const modalLinks = document.querySelectorAll(".modal-link");
    const modals = document.querySelectorAll(".modal");
    const closeButtons = document.querySelectorAll(".close");

    modalLinks.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const modalId = link.getAttribute("data-modal");
            const modal = document.getElementById(modalId);
            modal.classList.add("open");
            document.querySelector(".modal-overlay").classList.add("open");
        });
    });

    closeButtons.forEach(button => {
        button.addEventListener("click", () => {
            const modal = button.closest(".modal");
            modal.classList.remove("open");
            document.querySelector(".modal-overlay").classList.remove("open");
        });
    });

    // Close modal on overlay click
    document.querySelector(".modal-overlay").addEventListener("click", () => {
        modals.forEach(modal => {
            modal.classList.remove("open");
        });
        document.querySelector(".modal-overlay").classList.remove("open");
    });
});
