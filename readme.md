# Talently Challenge

> ℹ️ **Descripción:** En terminos generales, además del objetivo de superar el reto, en este proyecto en relación a las 
> buenas prácticas 
> y clean code he aplicando conceptos de **Arquitectura Hexagona , Domain Driven Design**, he intentado también 
> simular el comportamiento de **CQRS** y también biene aplicado el patrón **Repository**. Para aplicar algunos 
> conceptos mencionados anteriormente, cree un **Pseudo Inyector de Dependencias**. Con todo esto estaríamos 
> aplicando lo más posible para este proyecto los principios **SOLID**.

## 🚀 Flujo

En mi afan de aplicar la buenas prácticas, no se salvo ni el flujo de trabajo 😅. Para este reto además de 
refactorizar el archivo `VillaPeruana.php` me pareción bien refactorizara también los 3 archivos referentes al flujo de trabajo `./start`, `./test` y `./finish`, centralizandolos en un solo archivo 
 `Makefile` con el objetivo reutilizar variables y comandos, y aplicar temas de mantenibilidad, escalabilidad y 
rendimiento, pensando a futuro como si fuese un proyecto real. Por ejemplo puse una condición para que si ya están 
instaladas las dependencias, al momento de volver a iniciar solo levante los contenedores y no se mande llamar a 
composer install.

En caso de no tenerlo instalado puedes usar `brew install make` es muy fácil de instalar y de usar espero les agrade

- Si quieres ir rápido 🏃‍💨 `make all` para levantar los contenedores y hacer el test
- Usa el comando `make start` para inicializar el docker
- Usa el comando `make test` para correr los tests
- Usa el comando `make finish` para desactivar el docker

## 👨‍💻 Explicación del proyecto


### ⛱ Contexts (DDD)

* [Productos](src/Productos): Contiene los casos de uso y el modelado de las reglas del negocio

### 🎯 Arquitectura Hexagonal

Esta es la estructura del proyecto aplicando Arquitectura Hexagonal. Está estructurado usando `módulos`, en este 
caso solo está `Productos`, pero el objetivo es que se puedan agregar varios más con sus propias reglas de negocio.

```
$ tree -L 5 src
src
├── Productos // Contexto o módulo, aquí van las características relacionadas con las reglas del negocio
│   └── Product
│       ├── Application // En la capa de aplicación están estructuradas todas las acciones
│       │   ├── ProductCalculator.php
│       │   └── ProductResponse.php
│       ├── Domain // En la capa de dominio se encuentran modeladas las reglas del negocio
│       │   ├── Product.php // Modela de manera genérica un producto 
│       │   ├── ProductName.php
│       │   ├── ProductQuality.php // Aquí están modeladas los requisito de que el quality como máximo es 50 ...
│       │   ├── ProductRepository.php // Una clase abstracta que modela el comportamiento común de los productos
│       │   ├── ProductSellIn.php
│       │   └── Repository.php
│       └── Infrastructure // Aquí se realiza mediante el patrón repository las implementaciones de cada uno 
│           ├── CafeProductRepository.php
│           ├── NormalProductRepository.php
│           ├── PiscoPeruanoProductRepository.php
│           ├── TicketVipRepository.php
│           └── TumiProductRepository.php
├── Shared
│   ├── Domain // Aquí se encuentra lo referente al domino, que se puede compartir entre los diferentes módulos
│   │   ├── Bus // Para simular un poco CQRS
│   │   │   └── Query
│   │   │       └── Response.php
│   │   └── ValueObject
│   │       ├── IntValueObject.php
│   │       └── StringValueObject.php
│   └── Infrastructure
│       └── Injector.php
└── VillaPeruana.php
```

### Patrón Repository

Nuestros repositorios intentan ser lo más simples posible, aplican 2 métodos `calcularSellIn` que se implementa 
desde la clase abstracta `ProductRepository` para el comportamiento común y `calcularQuality` para los detalle de 
implementación.

### CQRS

Intenté simular CQRS siguiendo el flujo desde la clase `VillaPeruana` para instanciar  `ProductCalculator` y 
devolviendo una clase de tipo `Response` para modelar una posible respuesta. 

# Preguntas de conocimiento en Laravel

1. Qué paquete o estrategia utilizarías para levantar un sistema de administración rápidamente? (Autenticación y CRUDs)

   **R:** Debo poner en la mesa que no he tenido experiencia con Laravel pero por lo que he visto y leído, usaría el paquete *JetStream.*

2. Una breve explicación de cómo laravel utiliza la injección de dependencias

   **R:** Laravel utiliza la injección de dependencias para administrar las dependencias de clases y para que al realizar la inyección nos devuelva una instacia de una clase. Este servicio o contenedor de inyección de dependencias, puede confundirse con las inyección de de dependencias de los principios SOLID pero son dos consas distintas.

3. En qué casos utilizarías un Query Scope?

   **R:** Lo utilizaría para recuperar las consultas en donde tuviese que filtrar por roles de usuario, se podría hacer un scope dinámico.

4. Qué convenciones utilizas en la creación e implementación de migraciones?

   **R:** Lo haría con nombres lo más semánticos y claros posibles, para que de un primer vistaso pueda tener un contexto de lo que se hizo en esa migración, sin duda dejaría la fecha al principio, podría  quedar algo como `2022_07_08_060735_create_categories_table`
