       IDENTIFICATION DIVISION.
       PROGRAM-ID. LEAP.
       DATA DIVISION.
       WORKING-STORAGE SECTION.
       01 WS-RESULT PIC 9.
       01 WS-YEAR PIC 9(4).
       01 DIVIDER PIC 9(3).
       PROCEDURE DIVISION.
       LEAP.
           IF FUNCTION MOD(WS-YEAR, 400) = 0 OR
              (FUNCTION MOD(WS-YEAR, 100) NOT = 0 AND
                 FUNCTION MOD(WS-YEAR, 4) = 0) THEN
              MOVE 1 TO WS-RESULT 
           ELSE
              MOVE 0 TO WS-RESULT
           END-IF.
       LEAP-EXIT.
           GOBACK.