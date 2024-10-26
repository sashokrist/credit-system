<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Описание на Програмата за Управление на Кредити

Уеб-базирано приложение, което позволява управление на кредити и плащания за кредитополучатели. Приложението включва различни функционалности и екрани, които дават възможност на потребителите лесно да създават, управляват и плащат кредити.

### Основни Функционалности:
1. **Управление на Кредити**:
    - **Създаване на Нов Кредит**: Потребителите могат да създават нов кредит чрез въвеждане на сума, срок и автоматично генериране на месечни вноски с лихвен процент. Програмата проверява дали кредитополучателят няма кредити на обща стойност повече от 80,000 лв., преди да позволи създаването на нов кредит.
    - **Изчисляване на Лихва**: При създаване на кредит, програмата автоматично изчислява общата сума с включена годишна лихва от 7,9% и определя месечната вноска.
    - **Списък с Кредити**: Програмата показва списък с всички създадени кредити, включително информация като код на кредита, име на кредитополучателя, сума на кредита, срок в месеци, месечна вноска и остатъчна сума.

2. **Управление на Плащания**:
    - **Извършване на Плащане**: Потребителите могат да изберат съществуващ кредит и да извършат плащане по него. Ако сумата на плащането е по-голяма от оставащата сума, програмата ще позволи плащането само на оставащото и ще уведоми потребителя.
    - **Проверка на Минимална Сума**: Програмата проверява дали сумата на плащането е по-малка от минималната месечна вноска и не позволява плащания под този минимум.
    - **Известия за Плащания**: След всяко плащане, програмата уведомява потребителя с информация за сумата, която е платена, и идентификатора на кредита.

3. **Потребителска Автентикация и Контрол на Достъпа**:
    - **Вход и Регистрация**: Потребителите могат да се регистрират и влизат в системата, за да получат достъп до управлението на кредити и плащания.
    - **Персонализирано Приветствие**: Когато потребителят е влязъл в профила си, в центъра на навигационната лента ще се показва приветствие с неговото име (например: "Здравей, Иван").

4. **Пагинация и Подредба**:
    - **Пагинация**: Списъкът с кредити е разделен на страници с по 5 кредита на страница, което улеснява разглеждането на голям брой записи.
    - **Подредба по Дата**: Кредитите се показват подредени от най-новите към най-старите, за да могат потребителите лесно да видят последните добавени кредити.

### Основни Екрани на Програмата:
1. **Начална Страница (Списък с Кредити)**:
    - Показва списък с всички кредити.
    - Включва информация като код, име на кредитополучателя, сума, срок, месечна вноска и остатъчна сума.
    - Визуално индикира активни и изплатени кредити чрез различни цветове на редовете:
        - Червени редове за изплатени кредити (с нулева остатъчна сума).
        - Зелени редове за активни кредити.
        - Остатъчната сума на активните кредити е показана с дебел червен шрифт.
    - Бутоните за пагинация улесняват навигацията между страниците.

2. **Екран за Създаване на Нов Кредит**:
    - Формуляр за въвеждане на сума на кредита и срок в месеци.
    - Автоматично изчисляване на лихва и месечна вноска.
    - Проверка за максимална стойност на всички кредити (не повече от 80,000 лв. общо).
    - Известие за успешно създаване на кредит.

3. **Екран за Извършване на Плащане**:
    - Падащо меню за избор на активен кредит, по който ще бъде направено плащането.
    - Формуляр за въвеждане на сумата на плащането.
    - Проверка за минимална и максимална сума, която може да се плати.
    - Показване на известие за успешно извършено плащане с информация за сумата и идентификатора на кредита.

4. **Екрани за Вход и Регистрация**:
    - Позволяват на потребителите да се регистрират и да влизат в системата.
    - След успешен вход, потребителите получават достъп до всички функционалности на системата.

SCREENSHOTS:
<img width="911" alt="s1" src="https://github.com/user-attachments/assets/e1fe4861-a212-4562-a17a-847d6ce1ad08">

<img width="901" alt="s2" src="https://github.com/user-attachments/assets/4612b3f3-0cc6-4b41-94d2-00edc303afed">

<img width="899" alt="s3" src="https://github.com/user-attachments/assets/3fb62cef-96e9-4f5c-bf47-0680579b4556">

<img width="935" alt="s4" src="https://github.com/user-attachments/assets/e9b5c858-2008-405f-b03d-e42a54bb50db">

<img width="920" alt="s5" src="https://github.com/user-attachments/assets/8f6177dc-5ec9-4f84-b6ed-11f38ea70cc5">

<img width="928" alt="s9" src="https://github.com/user-attachments/assets/82a54b6d-ae3f-48c5-abe9-5457a134a742">

<img width="891" alt="s8" src="https://github.com/user-attachments/assets/d5fb85ea-e7c0-4b02-95d3-fa5fa7c933f4">

<img width="864" alt="s7" src="https://github.com/user-attachments/assets/5529d336-c821-4c42-8786-490d017660d2">

<img width="665" alt="s6" src="https://github.com/user-attachments/assets/7e9c221f-6bee-4257-9e50-246d116c67b8">

<img width="920" alt="s5" src="https://github.com/user-attachments/assets/8f1728e2-8115-45af-8a88-e4e742063f35">







