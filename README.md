Есть 2 массива шаров. У каждого шара есть цвет (синий или красный) и номер.
В обоих массивах присутствуют шары обоих цветов. Необходимо реализовать функцию,
которая будет на вход принимать оба набора шаров, а возвращать - количество синих шаров без повторяющихся номеров.

Реализация шаров:

```php
final enum Color {
    case RED;
    case BLUE;
}

final class Ball {
    private static $instances = [];

    private function __construct(public readonly Color $color, public readonly int $number) 
    {
    }
    
    public static function instance(Color $color, int $number): self
    {
        if (!isset(self::$instances[$color][$number])) {
            self::$instances[$color][$number] = new self($color, $number);
        }
        
        return self::$instances[$color][$number];
    }
}
```
