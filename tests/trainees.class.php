<?php
class TraineeTest extends CRUDTest
{
    protected $model = "Trainee";
    protected $controller = "TraineesController";
}
APP::modules()->tester->register_test('Trainees Test', new TraineeTest());
?>