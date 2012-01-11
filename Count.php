<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Count
 *
 * @author christ
 */
class Count {
    
    public function __construct() {
        
    }
    
    private function stripOneLineComments($line) {
        $line = preg_replace('/\/\*.*?\*\//', '', $line);
        $line = preg_replace('/\/\/.*/', '', $line);
        return $line;
    }


    public function countLines(array $code) {
        $lineCount = count($code);
        $inComment = false;
        $inFirstLineComment = false;
        $codeLines = array();
        foreach($code as $line){
            $line = $this->stripOneLineComments($line);
            if(preg_match('/^.*?\/\*/', $line) && !$inComment){
                $line = preg_replace('/\/\*.*/', '', $line);
                $inComment = true;
                $inFirstLineComment = true;
            }
            if(preg_match('/^.*?\*\//', $line) && $inComment){
                $line = preg_replace('/.*\*\//', '', $line);
                $inComment = false;
            }
            if(strlen(trim($line)) == 0 && (!$inComment || $inFirstLineComment)){
                $lineCount--;
            }
            $inFirstLineComment = false;
        }
        return $lineCount;
    }
}

?>
