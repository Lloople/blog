# Simple Blog made with Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lloople/blog.svg?style=flat-square)](https://packagist.org/packages/lloople/blog)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/lloople/blog/master.svg?style=flat-square)](https://travis-ci.org/lloople/blog)
[![StyleCI](https://styleci.io/repos/111293285/shield)](https://styleci.io/repos/111293285)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/ff5b5b8d-58b1-4354-9943-63e05fc02620.svg?style=flat-square)](https://insight.sensiolabs.com/projects/ff5b5b8d-58b1-4354-9943-63e05fc02620)
[![Quality Score](https://img.shields.io/scrutinizer/g/lloople/blog.svg?style=flat-square)](https://scrutinizer-ci.com/g/lloople/blog)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/lloople/blog/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/lloople/blog/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/lloople/blog.svg?style=flat-square)](https://packagist.org/packages/lloople/blog)

## Backend

### Logging in

- url: /backend
- default user: admin@blog.test / admin

There's no interface for changing user's information yet. You can change
user's password using tinker

```php
$ php artisan tinker
> $user = App\Models\User::find(1);
> $user->password = bcrypt('newPassword');
> $user->save();
```

### Posts Content
The body of the posts are saved in markdown. Laravel uses [Erusev's Parsedown package](https://github.com/erusev/parsedown) to transform it into HTML.
Backend UI uses [SimpleMDE](https://github.com/sparksuite/simplemde-markdown-editor) to show a friendly markdown editor
### Tables

All list tables were made using [Spatie's Vue Table Component package](https://github.com/spatie/vue-table-component).
Pagination and search are server-side

### Changing theme

Main app colors are defined by [Tailwind CSS colors](https://tailwindcss.com/docs/colors).

You can manage themes from the backend on `backend/themes`. Only one theme can be active at a time.
 
## Frontend

### Posts List

In order to see a post, it must be `visible` and `publish_date` must be in past.

### Algolia's Search (currently untested)

There's a box on the top-right corner for searching posts that uses algolia instant search javascript component. 
You can define your Algolia credentials in the `.env` file.

### Featured posts

A featured post is visible from anywhere on the frontend UI. It's showed on the sidebar present in any page. It must be published and visible as well.

## Inspiration
When I got stuck developing this project, I used [Freek Van Der Herten's blog](https://github.com/spatie/murze.be) to find a way to solve the problem or inspiration for future features. Thanks for sharing it! 👍
## Credits

- [Laravel Framework 5.5](https://laravel.com/docs/5.5)
- [Vue 2.1](https://vuejs.org/v2/guide/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Spatie's Vue Table Component](https://github.com/spatie/vue-table-component)
- [SimpleMDE](https://simplemde.com/)
- [Algolia Instant Search](https://github.com/algolia/instantsearch.js/)
- [Freek Van Der Herten's blog](https://github.com/spatie/murze.be)
