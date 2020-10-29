<h1 align="center"> laravel-builder </h1>

<p align="center"> Laravel 代码生成工具.</p>

![StyleCI build status](https://github.styleci.io/repos/308207255/shield) 

## 安装

可以使用 Composer 将 Builder 安装到你的 Laravel 项目里：

```shell
$ composer require pretendtrue/laravel-builder -vvv
```

Builder 安装之后，使用 `builder:install` Artisan 命令发布资源：

```shell
$ php artisan builder:install
```

## 使用

安装后，打开您的网站 `http://your_host/builder` ，您可以在生成的 `config/builder` 文件中，修改您的访问地址

## 升级
升级到新的 Builder 版本时，您应该重新发布 Builder 资源：

```shell
$ php artisan builder:publish
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/pretendtrue/laravel-builder/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/pretendtrue/laravel-builder/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT