<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <style type="text/css">
        * {
            font-size: 100%;
            font-family: Arial;
            font-weight: 600;
        }
    </style>

    <h1>Brainfuck Interpreter</h1>

    <h2>Brainfuck operators</h2>

    <p>
        > | increases memory pointer, or moves the pointer to the right 1 block <br>
        < | decreases memory pointer, or moves the pointer to the left 1 block <br>
            + | increases value stored at the block pointed to by the memory pointer <br>
            - | decreases value stored at the block pointed to by the memory pointer <br>
            [ | start of while(cur_block_value !=0) loop. <br>
            ] | if current block's value != zero, jump back to [ <br>
            , | input 1 character. (NOT IMPLEMENTED) <br>
            . | print 1 character <br>
    </p>

    <h2>ASCII table</h2>

    <img src="asciifull.gif" />

    <br>

    <?php
    echo "Sample 1: >++++++++[<++++++++++>-]<+++. <br>";
    echo "Sample 2: >+++++++++[<++++++++>-]<.>+++++++[<++++>-]<+.+++++++..+++.[-]
                    >++++++++[<++++>-] <.>+++++++++++[<++++++++>-]<-.--------.+++
                    .------.--------.[-]>++++++++[<++++>- ]<+.[-]++++++++++. <br>";
    echo "Sample 3: >++++++++[<++++++++++>-]<+++.+.-----.-.---.++++++++. <br>";
    ?>

    <br>

    <form action="brain.php" method="post" id="fuckform">
        <textarea rows="1" cols="100" name="brain"></textarea>
        <input type="submit" name="submit" value="FUCK" />
    </form>


    <br>

    <?php

    $size = 30000;
    $memory = array_fill(0, $size, 0);
    $brain = isset($_POST['brain']) ? $_POST['brain'] : '';
    echo "Brain: $brain <br>";
    $loops = array();
    $current = 0;

    // Fucking the brain
    echo "Results: ";
    for ($i = 0; $i < strlen($brain); $i++) {
        switch ($brain[$i]) {
            case ">":
                if ($current < $size - 1) {
                    $current++;
                }
                break;
            case "<":
                if ($current > 0) {
                    $current--;
                }
                break;
            case "+":
                $memory[$current]++;
                break;
            case "-":
                if ($memory[$current] > 0) {
                    $memory[$current]--;
                }
                break;
            case "[":
                $loops[] = $i;
                break;
            case "]":
                if ($memory[$current] == 0) {
                    array_splice($loops, count($loops) - 1);
                } else {
                    $i = $loops[count($loops) - 1];
                }
                break;
            case ",": //WIP
                break;
            case ".":
                echo chr($memory[$current]);
                break;
            default:
                break;
        }
    }
    ?>



</body>

</html>