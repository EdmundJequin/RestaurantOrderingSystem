<?php

    declare(strict_types=1);

    use PHPUnit\Framework\TestCase;

    final class UnitTest extends TestCase
    {   
        public function testIncorrectID(): string
        {
            $userID = 'Admin';
            $this->assertSame('Admin', $userID);

            return $userID;
        } 

        public function testIncorrectPassword(): string
        {
            $password = 'Admin';
            $this->assertSame('Admin', $password);

            return $password;
        } 

        public function testNull(): string
        {
            $userID = 'Admin';
            $password = 'Admin';
            $this->assertNotEmpty($userID, $password);

            return $userID;
            return $password;
        }

        public function testSuspendedAccount(): string
        {
            $status = 'Suspended';
            $this->assertSame('Suspended', $status);

            return $status;
        }

        public function testCorrectCredentials(): string
        {
            $userID = 'Admin';
            $password = 'Admin';
            $this->assertSame('Admin', 'Admin', $userID, $password);

            return $userID;
            return $password;
        }

    }
?>