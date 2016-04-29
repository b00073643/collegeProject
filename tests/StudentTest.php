<?php
use Itb\StudentManager;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 17/04/2016
 * Time: 00:03
 */
class StudentTest
{


    public function testZeroTotalWrongWhenCreated()
    {
        // Arrange
        $qm = new QuizManager();
        $expectedResult = 0;

        // Act
        $result = $qm->getTotalQuestionsWrong();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
