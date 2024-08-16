# 快易知（网站版）

[生产环境链接](https://www.kuaiyizhi.cn)

## 开发

### 技术栈

- Caddy
- Laravel
- Laravel Livewire

### 在本机开发

- 准备

  ```
  cp .env.example .env
  composer install
  php artisan key:generate
  php artisan migrate
  ```

- 安装 NPM 依赖

  统一使用 pnpm，不使用 npm

  ```
  pnpm i
  ```

- 后端启动监听

  ```shell
  php artisan serve
  ```

- 前端启动服务

  ```shell
  npm run dev
  ```

- 填充数据

  ```shell
  php artisan db:seed
  ```

### 在容器中开发

#### 镜像

在`.devcontainer`文件夹中定义。

#### 配合 VS Code 使用

1. 安装 DevContainer 扩展
2. 点击左下角在容器中打开即可

#### 配合 OrbStack 使用

容器中的 Caddy 已启动监听，OrbStack 会自动分配一个域名并解析，打开这个域名即可看到页面。

## 部署

### 缓存

使用了 <https://github.com/JosephSilber/page-cache> 做页面缓存，需要手动更新缓存。

### Caddy

参考`.devcontainer`中的`Caddyfile`
