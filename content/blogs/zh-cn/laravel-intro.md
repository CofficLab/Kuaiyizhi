---
title: Laravel 入门完全指南
date: 2025-04-15
excerpt: Laravel 是当前最流行的 PHP 全栈开发框架，具有优雅的语法、MVC 架构、内置工具和活跃的社区。本文介绍了 Laravel 的核心特性、环境准备、路由系统、控制器、模型与数据库、快速构建示例应用、特色功能、学习路径建议、常见问题和资源推荐。
authors:
  - name: Nookery
    picture: https://avatars.githubusercontent.com/u/5194193?s=200
    url: https://github.com/nookery
tags:
  - Laravel
---

## 什么是 Laravel？

Laravel 是当前最流行的 PHP 全栈开发框架，具有以下核心特性：

1. **优雅的语法**：简洁直观的代码结构
2. **MVC 架构**：清晰分离业务逻辑与展示层
3. **内置工具**：包含身份验证、队列、缓存等常用功能
4. **活跃社区**：拥有完善的生态系统和文档支持

## 环境准备

### 1. 系统要求

- PHP ≥ 8.1
- Composer 包管理器
- 数据库（MySQL/PostgreSQL/SQLite）
- Web 服务器（Nginx/Apache）

### 2. 安装 Laravel

使用 Composer 创建新项目：

```bash
composer create-project laravel/laravel my-project
cd my-project
php artisan serve
```

访问 `http://localhost:8000` 查看欢迎页面

## 核心概念

### 1. 路由系统

定义在 `routes/web.php`：

```php
Route::get('/hello', function () {
    return view('welcome', ['name' => '新用户']);
});
```

### 2. 控制器

创建控制器：

```bash
php artisan make:controller UserController
```

示例控制器方法：

```php
public function show($id)
{
    return User::findOrFail($id);
}
```

### 3. 模型与数据库

创建模型及迁移文件：

```bash
php artisan make:model Post -m
```

迁移文件示例：

```php
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->timestamps();
    });
}
```

## 快速构建示例应用

### 1. 创建待办事项功能

生成脚手架：

```bash
php artisan make:model Todo -mcr
```

### 2. 定义路由

```php
Route::resource('todos', TodoController::class);
```

### 3. 控制器逻辑

```php
class TodoController extends Controller
{
    public function index()
    {
        return view('todos.index', [
            'todos' => Todo::all()
        ]);
    }

    public function store(Request $request)
    {
        Todo::create($request->validate([
            'title' => 'required|max:255'
        ]));

        return redirect('/todos');
    }
}
```

### 4. 视图模板

`resources/views/todos/index.blade.php`：

```html
@extends('layouts.app') @section('content')
<h1>待办事项</h1>
<form method="POST" action="/todos">
  @csrf
  <input type="text" name="title" required />
  <button type="submit">添加</button>
</form>

<ul>
  @foreach ($todos as $todo)
  <li>{{ $todo->title }}</li>
  @endforeach
</ul>
@endsection
```

## 特色功能

### 1. Blade 模板引擎

```html
@if ($items->isEmpty())
<div class="alert">暂无数据</div>
@else @foreach ($items as $item)
<div>{{ $item->name }}</div>
@endforeach @endif
```

### 2. Artisan 命令行

常用命令：

```bash
php artisan make:model Product -a  # 创建模型及相关文件
php artisan migrate:refresh --seed # 重置数据库并填充测试数据
php artisan queue:work             # 启动队列处理
```

### 3. Eloquent ORM

高级查询示例：

```php
$users = User::where('active', true)
            ->with('posts')
            ->orderBy('name')
            ->paginate(10);
```

## 学习路径建议

1. **基础阶段**（1-2 周）

   - 路由与控制器
   - Blade 模板基础
   - 数据库迁移与 Eloquent

2. **进阶阶段**（3-4 周）

   - 用户认证系统
   - 队列与任务调度
   - API 开发

3. **实战阶段**（5-6 周）
   - 构建完整 CRUD 应用
   - 集成第三方服务
   - 性能优化技巧

## 常见问题

### Q1：如何调试应用？

使用 `dd()` 函数：

```php
dd($variable); // 打印并终止执行
```

### Q2：如何配置环境变量？

修改 `.env` 文件：

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

## 资源推荐

1. [官方文档](https://laravel.com/docs)（含中文版）
2. [Laracasts](https://laracasts.com) 视频教程
3. [GitHub 开源项目集](https://github.com/laravel)
4. 中文社区：[Laravel China](https://learnku.com/laravel)

## 总结

Laravel 通过其优雅的语法和丰富的功能，大幅降低了 PHP Web 开发的门槛。建议初学者从构建简单 CRUD 应用开始，逐步掌握核心概念，并善用 Artisan 工具提升开发效率。持续关注官方文档更新，参与社区讨论，是快速成长的关键。
