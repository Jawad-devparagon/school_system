
export default function initDropdown() {
    const dropdownHeaders = document.querySelectorAll('.dropdown-toggle');
    dropdownHeaders.forEach(header => {
        const dropdownWrapper = header.nextElementSibling;

        header.addEventListener('click', function (event) {
            event.stopPropagation();
            const isVisible = dropdownWrapper.classList.contains('active');
            const isUseForNav = dropdownWrapper.classList.contains('side-nav-dropdown-wrapper');

            if(isUseForNav) {
                document.querySelectorAll('.dropdown-menu.side-nav-dropdown-wrapper.active').forEach(activeWrapper => {
                    if (activeWrapper !== dropdownWrapper) {
                        activeWrapper.classList.remove('active');
                        activeWrapper.previousElementSibling.classList.remove('active');
                    }
                });

                dropdownWrapper.classList.toggle('active', !isVisible);
                header.classList.toggle('active', !isVisible);
            } else {
                document.querySelectorAll('.dropdown-menu.active').forEach(activeWrapper => {
                    if (activeWrapper !== dropdownWrapper && !activeWrapper.classList.contains('side-nav-dropdown-wrapper')) {
                        activeWrapper.classList.remove('active');
                        activeWrapper.previousElementSibling.classList.remove('active');
                    }
                });

                if ( !dropdownWrapper.classList.contains('side-nav-dropdown-wrapper')) {
                    dropdownWrapper.classList.toggle('active', !isVisible);
                    header.classList.toggle('active', !isVisible);
                }
            }
        });
    });

    document.addEventListener('click', function () {
        document.querySelectorAll('.dropdown-menu.active').forEach(activeWrapper => {
            if (!activeWrapper.classList.contains('side-nav-dropdown-wrapper')) {
                activeWrapper.classList.remove('active');
                if (activeWrapper.previousElementSibling) {
                    activeWrapper.previousElementSibling.classList.remove('active');
                }
            }
        });
    });
}
