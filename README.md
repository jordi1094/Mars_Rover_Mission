# KATA MARS ROVER MISSION:

### To Run the project, install the dependencies and run the following commands;

```
php ./src/index.php 
```
---
### To do the tests, run the following commands:

```
composer dump-autoload 
./vendor/bin/phpunit   
```
The fist command is to be sure that the composer have the files updated.
---

## Project features.
- [X] The rover TouchDown in mars un a especific position and facing direction.
- [X] The rover reveives a collection of comands. (E.g.) FFRRFFFRL
- [X] The rover can comve forward (f).
- [X] The rover can rotate (l/r).
- [X] The planet is square.
- [X] The reover detects obtacles before move to new square. It stop the sequence and reports the obstacle.
- [X] Follow Tdd Method.

## Project Estructure.

- class: All the objects needed in the project.
- logic: All the logics to conect the initial program with the objects.
- index.php: Its the main file to execute.
- test: this folder contains the test to check the correct work of the project.



