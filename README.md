# Money batch for minimalist
Working with one currency on Laravel? Need easy, affective and stable way to work with Money?
Pick the Laravel Minimalist.

This is a Laravel version of [moneybatch/minimalist](https://github.com/moneybatch/minimalist)

## Installation
`composer require moneybatch/laravel-minimalist`

## Usage

### Money
`Moneybatch\LaravelMinimalist\Domain\Money` and `Moneybatch\LaravelMinimalist\Domain\Price` are extensions of [moneybatch/minimalist](https://github.com/moneybatch/minimalist) and can be used the same way. See [details](https://github.com/moneybatch/minimalist/blob/master/README.md). 

### Eloquent: Mutators & Casting
To cast the attribute to Money, just use the standard Eloquent model `casts` attribute:

```
protected $casts = [
    'balance' => Money::class,
];
```

Don't forget to import the class prior to using it:
`use Moneybatch\LaravelMinimalist\Domain\Money`;