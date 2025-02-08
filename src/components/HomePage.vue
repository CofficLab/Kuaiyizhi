<template>
    <div class="not-content">
        <!-- Hero Section -->
        <div class="hero-section">
            <div class="hero-content flex flex-col items-center justify-center">
                <p class="hero-tagline">追寻知识的纯粹之光</p>
                <div class="hero-actions">
                    <a href="/zh-cn/build_your_own_web_toolbox" class="action-button">
                        一起搭建工具箱网页
                        <span class="icon">→</span>
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <img src="/images/hero-star.webp" alt="Hero image" />
            </div>
        </div>

        <!-- Card Grid -->
        <div class="card-grid">
            <div class="card">
                <div class="card-icon">📖</div>
                <h3 class="card-title">令人愉悦的文档</h3>
                <p class="card-content">网站导航、搜索、国际化、易于阅读的排版、代码高亮、深色模式</p>
            </div>
            <div class="card">
                <div class="card-icon">🚀</div>
                <h3 class="card-title">快速加载</h3>
                <p class="card-content">绝不拖累你的浏览器</p>
            </div>
            <div class="card">
                <div class="card-icon">📄</div>
                <h3 class="card-title">广告全无</h3>
                <p class="card-content">没有广告，用户体验永远最佳</p>
            </div>
            <div class="card">
                <div class="card-icon">🧩</div>
                <h3 class="card-title">生动的文档</h3>
                <p class="card-content">文档不再是静态的文字和图片，你可以和它充分交互</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
.hero-section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 4rem 0;
    gap: 2rem;
}

.hero-content {
    flex: 1;
}

.hero-title {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.hero-tagline {
    font-size: 1.5rem;
    color: var(--sl-color-gray-2);
    margin-bottom: 2rem;
}

.hero-actions {
    display: flex;
    gap: 1rem;
}

.action-button {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background-color: var(--sl-color-text-accent);
    color: white;
    border-radius: 0.5rem;
    text-decoration: none;
    font-weight: 500;
    transition: background-color 0.2s;
}

.action-button:hover {
    background-color: var(--sl-color-text-accent);
    opacity: 0.9;
}

.hero-image {
    flex: 1;
    max-width: 400px;
}

.hero-image img {
    width: 100%;
    height: auto;
}

.card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    padding: 2rem 0;
}

.card {
    padding: 1.5rem;
    border: 1px solid var(--sl-color-gray-5);
    border-radius: 0.5rem;
    background: var(--sl-color-bg);
}

.card-icon {
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

.card-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.card-content {
    color: var(--sl-color-gray-2);
    line-height: 1.6;
}

@media (max-width: 768px) {
    .hero-section {
        flex-direction: column;
        text-align: center;
    }

    .hero-image {
        order: -1;
    }
}
</style>
