       IDENTIFICATION DIVISION.
       PROGRAM-ID. reverse-string.
       DATA DIVISION.
       WORKING-STORAGE SECTION.
       01 WS-STRING PIC X(64).

       PROCEDURE DIVISION.
       REVERSE-STRING.
           MOVE FUNCTION TRIM(FUNCTION REVERSE(WS-STRING)) TO WS-STRING.