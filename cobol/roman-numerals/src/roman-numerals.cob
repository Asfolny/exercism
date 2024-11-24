       IDENTIFICATION DIVISION.
       PROGRAM-ID. ROMAN-NUMERALS.
       ENVIRONMENT DIVISION.
       DATA DIVISION.
       WORKING-STORAGE SECTION.
       01 WS-NUMBER PIC 9999.
       01 WS-RESULT PIC X(20).
       01 WS-INTERM PIC X(10).
       PROCEDURE DIVISION.
       ROMAN-NUMERALS.
           MOVE SPACES TO WS-RESULT.

      * We don't have to handle above M
           PERFORM UNTIL WS-NUMBER < 1000
              STRING WS-INTERM DELIMITED BY SPACE
                     "M"       DELIMITED BY SPACE
              INTO WS-INTERM
              COMPUTE WS-NUMBER = WS-NUMBER - 1000
           END-PERFORM.
      * Clear tmp and update result
           STRING WS-RESULT DELIMITED BY SPACE
                  WS-INTERM DELIMITED BY SPACE
           INTO WS-RESULT.
           MOVE SPACE TO WS-INTERM.

           PERFORM UNTIL WS-NUMBER < 100
              STRING WS-INTERM DELIMITED BY SPACE
                     "C"       DELIMITED BY SPACE
              INTO WS-INTERM

              IF WS-INTERM = "CCCC" THEN
                 MOVE "CD" TO WS-INTERM
              END-IF
              IF WS-INTERM = "CDC" THEN
                 MOVE "D" TO WS-INTERM
              END-IF
              IF WS-INTERM = "DCCCC" THEN
                 MOVE "CM" TO WS-INTERM
              END-IF

              COMPUTE WS-NUMBER = WS-NUMBER - 100
           END-PERFORM.

      * Clear tmp and update result
           STRING WS-RESULT DELIMITED BY SPACE
                  WS-INTERM DELIMITED BY SPACE
           INTO WS-RESULT.
           MOVE SPACE TO WS-INTERM.

           PERFORM UNTIL WS-NUMBER < 10
              STRING WS-INTERM DELIMITED BY SPACE
                     "X"       DELIMITED BY SPACE
              INTO WS-INTERM

              IF WS-INTERM = "XXXX" THEN
                 MOVE "XL" TO WS-INTERM
              END-IF
              IF WS-INTERM = "XLX" THEN
                 MOVE "L" TO WS-INTERM
              END-IF
              IF WS-INTERM = "LXXXX" THEN
                 MOVE "XC" TO WS-INTERM
              END-IF

              COMPUTE WS-NUMBER = WS-NUMBER - 10
           END-PERFORM.

      * Clear tmp and update result
           STRING WS-RESULT DELIMITED BY SPACE
                  WS-INTERM DELIMITED BY SPACE
           INTO WS-RESULT.
           MOVE SPACE TO WS-INTERM.

           PERFORM UNTIL WS-NUMBER < 1
              STRING WS-INTERM DELIMITED BY SPACE
                     "I"       DELIMITED BY SPACE
              INTO WS-INTERM

              DISPLAY WS-INTERM
              DISPLAY WS-NUMBER
              IF WS-INTERM = "IIII" THEN
                 MOVE "IV" TO WS-INTERM
              END-IF
              IF WS-INTERM = "IVI" THEN
                 MOVE "V" TO WS-INTERM
              END-IF
              IF WS-INTERM = "VIIII" THEN
                 MOVE "IX" TO WS-INTERM
              END-IF

              COMPUTE WS-NUMBER = WS-NUMBER - 1
           END-PERFORM.

      * Clear tmp and update result
           STRING WS-RESULT DELIMITED BY SPACE
                  WS-INTERM DELIMITED BY SPACE
           INTO WS-RESULT.
           MOVE SPACE TO WS-INTERM.
