# kn

- PHP
  - comment
  - composer
- laravel
  - cli
    - php artisan route:list 
    - mfsc
  - testing
    - php artisan test vs phpunit
    - DB testing
    - mocking db facade
    - factory in dataprovider
    - coverage
  - cors
  - exception
  - CI/CD
  - serialize
  - mail
  - ORM(Eloquent)
    - Scope
    - Seed, Factory
  - formRequest + validator
    - 動的項目
  - validation rules
  - validation
    - dynamic field

## PHP/Laravel

- https://laravel.com/api/8.x/index.html

--

## PHP Unit

*Table Driven Test* でUnit/Featureテストを書きたい場合は、データプロバイダを利用すると良い。データプロバイダメソッドは文字列と対応するデータセットで表現することができるため、各テストケースの件名付が容易。

- https://phpunit.readthedocs.io/ja/latest/index.html
- https://phpunit.readthedocs.io/ja/latest/writing-tests-for-phpunit.html#writing-tests-for-phpunit-data-providers
- https://qiita.com/Hiraku/items/5c49987f4e9e167dad86
- https://readouble.com/mockery/1.0/ja/index.html

### テストタブル

- https://phpunit.readthedocs.io/ja/latest/test-doubles.html#test-doubles-mock-objects

### php artisan test vs phpunit

```sh
# php artisan
$ php artisan test

# phpunit
$ ./vendor/bin/phpunit ./tests
```

## Exception

- http://blog.tojiru.net/article/455279557.html

## CORS

- https://github.com/fruitcake/laravel-cors

## Architecture

- route
  - middleware
- controller
  - formrequest
- service
  - eloquent
    - model
    - trait
- exception

## Composer

PHPのパッケージ管理。 *scripts*でPHPのタスク管理も可能。

- https://getcomposer.org/

## ORM

### Scope

Eloquent(モデル)に対して実行されるクエリに対して共通的な条件を加えたい。

- https://readouble.com/laravel/8.x/ja/eloquent.html

### Seed, Factory

hasManyの関係で、多のレコードは任意のカラムの値をそれぞれ変えたい。
A:B=1:多

```php
ModelA::factory()
  ->has(
      ModelB::factory()
      ->count(5)
      ->state(new Sequence(
          [ 'column' => 'a'],
      ),
      'own_method')
  )
  ->create();

public function own_method()
{
  $this->hasMany(ModelB::class, '<relation_column>');
}

```

## validation

### rules

- in: 対象リストに含まれているか
- exists: テーブルに属性値を持つレコードを含まれているか
- size: 同サイズ

#### 参考

- https://readouble.com/laravel/8.x/ja/validation.html#available-validation-rules
- https://qiita.com/kd9951/items/abd063828e33a61c8c58

### dynamic field

- roles()内にロジックを追加する
- ワイルドカード指定(配列指定)する
- withValidator()でバリデータをフックする

#### 参考

- https://laracasts.com/discuss/channels/laravel/validate-dynamic-fields-with-fromrequest-in-laravel
- https://readouble.com/laravel/8.x/ja/validation.html#adding-after-hooks-to-form-requests
- https://readouble.com/laravel/8.x/ja/validation.html#validating-arrays
