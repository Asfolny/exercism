       IDENTIFICATION DIVISION.
       PROGRAM-ID. raindrops.
       DATA DIVISION.
       WORKING-STORAGE SECTION.
       01 WS-NUMBER PIC 9(4).
       01 WS-RESULT PIC X(20).

       PROCEDURE DIVISION.
       RAINDROPS.
           IF FUNCTION MOD(WS-NUMBER, 3) = 0 THEN
           STRING WS-RESULT DELIMITED BY SPACE
                  "Pling"   DELIMITED BY SPACE
           INTO WS-RESULT
           END-IF.
           
           IF FUNCTION MOD(WS-NUMBER, 5) = 0 THEN
           STRING WS-RESULT DELIMITED BY SPACE
                  "Plang"   DELIMITED BY SPACE
           INTO WS-RESULT
           END-IF.

           IF FUNCTION MOD(WS-NUMBER, 7) = 0 THEN
           STRING WS-RESULT DELIMITED BY SPACE
                  "Plong"   DELIMITED BY SPACE
           INTO WS-RESULT
           END-IF.

           IF WS-RESULT = SPACE
           THEN MOVE WS-NUMBER to WS-RESULT
           END-IF.