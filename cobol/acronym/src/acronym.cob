       IDENTIFICATION DIVISION.
       PROGRAM-ID. acronym.
       ENVIRONMENT DIVISION.
       CONFIGURATION SECTION.
       SPECIAL-NAMES.
           CLASS ALPHA-NAME 'A' THRU 'Z'
              'a' THRU 'z'.
       DATA DIVISION.

       WORKING-STORAGE SECTION.
       01 WS-ACRONYM               PIC X(80).
       01 WS-RESULT                PIC X(20).
       01 WS-POS                   PIC 9(3).
       01 WS-FLAG                  PIC 9 VALUE 1.
       01 WS-LOOKAHEAD             PIC 9(3) VALUE 0.

       PROCEDURE DIVISION.
       ABBREVIATE.
           MOVE SPACES TO WS-RESULT.
          
           PERFORM VARYING WS-POS FROM 0 BY 1
           UNTIL WS-ACRONYM(WS-POS:2) = ' '
              IF WS-FLAG = 1 THEN
                 STRING FUNCTION TRIM(WS-RESULT) DELIMITED BY SPACE
                        FUNCTION UPPER-CASE(WS-ACRONYM(WS-POS:1))
                           DELIMITED BY SPACE
                 INTO WS-RESULT
                 MOVE 0 TO WS-FLAG
              END-IF

              COMPUTE WS-LOOKAHEAD = WS-POS + 1

              IF WS-ACRONYM(WS-POS:1) NOT ALPHA-NAME
                 AND WS-ACRONYM(WS-POS:1) NOT EQUAL "'"
                 AND WS-ACRONYM(WS-LOOKAHEAD:1) ALPHA-NAME
              THEN
                 MOVE 1 TO WS-FLAG
              END-IF
           END-PERFORM.