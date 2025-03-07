export default function initTab() {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-pane');

    function activateTab(targetId) {
        tabContents.forEach(content => {
            content.classList.add('hidden');
        });

        tabButtons.forEach(button => {
            button.classList.remove('active');
        });

        const targetContent = document.getElementById(targetId);
        if (targetContent) {
            targetContent.classList.remove('hidden');
        }

        const activeButton = document.querySelector(`.tab-button[data-target="${targetId}"]`);
        if (activeButton) {
            activeButton.classList.add('active');
        }
    }

    if (tabButtons.length > 0) {
        const firstTab = tabButtons[0];
        const firstTarget = firstTab.getAttribute('data-target');
        activateTab(firstTarget);
    }

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const target = button.getAttribute('data-target');
            activateTab(target);
        });
    });

}
