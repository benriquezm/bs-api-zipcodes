# API Zip Codes -> Backbonesystem
## _¿Cómo se llegó a la solución?_

Se realizó un análisis y con base a lo leído en el archivo PDF del reto se llegaron a las siguientes conclusiones:

- Revisar las versiones de Laravel y la documentación, ya que en mi caso en particular me quede en la versión 5 y actualmente pues ya está la 9 y quizá algunas cosas fueron actualizas o eliminadas.
- Crear un ambiente de desarrollo haciendo uso de Docker
- Utilizar AWS Elastic Beanstalk, ya que fue prácticamente sencillo poder desplegar el ambiente para un entorno de producción y sobre todo que pudiera contar con un buen tiempo de ejecución al momento de solicitar la API.
- Analizar los datos, ver como se iba a estructurar el JSON y ver como se iba a guardar la información en la DB.

## Goals Code

- En un momento se pensó poder utilizar la metodología de diseño TDD, ya que es una metodología que tiene muchas ventajas sobre todo poder escribir un código con pruebas unitarias, en vez de la manera tradicional, no se pudo realizar ya que en mi caso no estoy muy familizarizado con los Test de lado de php, pero si se realizaron pruebas unitarias del código implementado.
- De lado de AWS se pudo implementar AWS Code Pipeline, ya que hoy en día es una manera de poder tener un mayor control sobre el código y evita que sea un proceso manual de envío de código a producción.

## Tech

Tecnología utilizada:

- [Laravel 9](https://laravel.com/docs/9.x) - The PHP Framework for Web Artisans!
- [Docker](https://www.docker.com/) - Develop faster. Run anywhere
- [AWS RDS] - Database MySQL.
- [AWS Codepipeline](https://aws.amazon.com/es/codepipeline/) - Automate continuous delivery pipelines for fast, reliable updates
- [AWS Elastic Beanstalk](https://aws.amazon.com/es/elasticbeanstalk/) - Deploy and extend web applications

## References

Implementar una aplicación con [AWS Elastick Beanstalk](https://docs.aws.amazon.com/es_es/elasticbeanstalk/latest/dg/php-laravel-tutorial.html#php-laravel-tutorial-database).
Implementar CI/CD [AWS Codepipline](https://gerrysabar.medium.com/simple-ci-cd-implementation-through-github-to-aws-beanstalk-for-laravel-cf85a1f51458).
Crear los reportes de cobertura de la corrida de los test con PHPUnit [Coverage PHPUnit](https://medium.com/@anowarhossain/code-coverage-report-in-laravel-and-make-100-coverage-of-your-code-ce27cccbc738).
Testing con PHPUnit en Laravel [php artisan test](https://auth0.com/blog/testing-laravel-apis-with-phpunit/).