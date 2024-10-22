# KuaiYiZhi

A website for showcasing and sharing knowledge.

## Development

### Tech Stack

- Caddy
- Laravel
- Laravel Livewire

### Local Development

- Preparation

  ```shell
  cp .env.example .env
  composer install
  php artisan key:generate
  php artisan migrate
  ```

- Install NPM Dependencies

  ```shell
  pnpm i
  ```

- Start Backend Server

  ```shell
  php artisan serve
  ```

- Start Frontend Service

  ```shell
  npm run dev
  ```

- Seed Data

  ```shell
  php artisan db:seed
  ```

### Development in Container

#### Image

Defined in the `.devcontainer` folder.

#### Use with VS Code

1. Install DevContainer extension
2. Click bottom-left corner to open in container

#### Use with OrbStack

Caddy in the container is already listening. OrbStack will automatically assign and resolve a domain. Open this domain to view the page.

## Deployment

### Cache

Using <https://github.com/JosephSilber/page-cache> for page caching. Manual cache update required.

### Caddy

Refer to `Caddyfile` in `.devcontainer`
