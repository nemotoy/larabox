<?php

use Time\TimeConsumer;

class TimeConsumerBench
{
    public function benchConsume()
    {
       $consumer = new TimeConsumer();
       $consumer->consume();
    }
}
