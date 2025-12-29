// Validation untuk memastikan rating dipilih
document.querySelector("form").addEventListener("submit", function (e) {
    const rating = document.querySelector('input[name="rating"]:checked');
    if (!rating) {
        e.preventDefault();

        // Scroll ke rating section
        document
            .querySelector('input[name="rating"]')
            .closest("div")
            .scrollIntoView({
                behavior: "smooth",
                block: "center",
            });

        // Show alert dengan styling
        const alertDiv = document.createElement("div");
        alertDiv.className =
            "fixed top-4 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-4 sm:px-6 py-3 sm:py-4 rounded-xl shadow-2xl z-50 flex items-center gap-2 sm:gap-3 animate-bounce w-[calc(100%-2rem)] sm:w-auto max-w-md";
        alertDiv.innerHTML = `
            <svg class="w-5 h-5 sm:w-6 sm:h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
            </svg>
            <span class="font-bold text-sm sm:text-base">Silakan pilih rating terlebih dahulu</span>
        `;
        document.body.appendChild(alertDiv);

        setTimeout(() => alertDiv.remove(), 3000);
    }
});
