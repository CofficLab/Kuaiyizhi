function switchTab(containerId, tabIndex) {
    const container = document.getElementById(containerId);
    if (!container) return;
    
    container.querySelectorAll('.tab-button').forEach((btn, i) => {
        btn.classList.toggle('active', i === tabIndex);
    });
    
    container.querySelectorAll('.tab-content').forEach((content, i) => {
        content.classList.toggle('active', i === tabIndex);
    });
} 