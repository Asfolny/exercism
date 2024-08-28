       IDENTIFICATION DIVISION.
       PROGRAM-ID. LEAP.
       DATA DIVISION.
       WORKING-STORAGE SECTION.
       01 WS-RESULT PIC 9.
       01 WS-YEAR PIC 9(4).
       01 DIVIDING.
           05 QUOTIENT PIC 9.
           05 REM PIC 9(3).
           05 DIVIDER PIC 9(3).
      * Quotient doesn't matter here, but is necessary for DIVIDE
      * REM sizing takes the MOST SIGNIFICANT NUMBER
      *    (e.g. REMAINDER = 60, REM = PIC 9 => REM = 6)
      *    So REM must be at least 3 digits to properly fit WS-YEAR/4
       PROCEDURE DIVISION.
       LEAP.
      * Enter solution here
           DIVIDE WS-YEAR BY 100 GIVING QUOTIENT REMAINDER REM.
           IF REM > 0 THEN
              MOVE 4 TO DIVIDER
           ELSE
              MOVE 400 TO DIVIDER
           END-IF.
           PERFORM IS-LEAP.
       LEAP-EXIT.
           GOBACK.

       IS-LEAP.
           DIVIDE WS-YEAR BY DIVIDER GIVING QUOTIENT REMAINDER REM.
           IF REM > 0 THEN
              MOVE 0 TO WS-RESULT
           ELSE
              MOVE 1 TO WS-RESULT
           END-IF.
