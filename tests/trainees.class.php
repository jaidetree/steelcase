<?php
class TraineeTest extends Test
{
    private $data = array();
    public function test_can_create()
    {
        for($i=0;$i<=20;$i++)
        {
            $trainee = new Trainee();
            $trainee->employee_id = md5($i);
            $trainee->created_at = md5($i);
            $trainee->last_visited_at = md5($i);
            $trainee->status = md5($i);
            $this->should_pass($trainee->save(), 'Saving trainee');
            $this->output( 'Saving trainee: ' . $trainee->employee_id);
            $this->data[] = $trainee;
        }
        $trainee = new Trainee();
        $this->assert_equal($trainee->save(true), true);
        $this->data[] = $trainee;
    }

    public function teardown()
    {
        foreach($this->data as $trainee)
        {
            $this->output( 'Deleting trainee: ' . $trainee->id);
            $trainee->delete();
        }
    }
}
APP::modules()->tester->register_test('Trainees Test', new TraineeTest());
?>