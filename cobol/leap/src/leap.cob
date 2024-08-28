       IDENTIFICATION DIVISION.
       PROGRAM-ID. LEAP.
       DATA DIVISION.
       WORKING-STORAGE SECTION.
       01 WS-RESULT PIC 9.
       01 WS-YEAR PIC 9(4).
       01 DIVIDER PIC 9(3).
       PROCEDURE DIVISION.
       LEAP.
           IF FUNCTION MOD(WS-YEAR, 100) > 0 THEN
              MOVE 4 TO DIVIDER
           ELSE
              MOVE 400 TO DIVIDER
           END-IF.
           PERFORM IS-LEAP.
       LEAP-EXIT.
           GOBACK.

       IS-LEAP.
           IF FUNCTION MOD(WS-YEAR, DIVIDER) > 0 THEN
              MOVE 0 TO WS-RESULT
           ELSE
              MOVE 1 TO WS-RESULT
           END-IF.
