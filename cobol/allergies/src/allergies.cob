       IDENTIFICATION DIVISION.
       PROGRAM-ID. allergies.

       DATA DIVISION.
       WORKING-STORAGE SECTION.
       01 WS-SCORE       PIC S9(4) COMP.
       01 WS-ITEM        PIC X(12).
       01 WS-RESULT      PIC A.
       01 WS-RESULT-LIST PIC X(108).

       01 WS-STR-BUFFER    PIC X(108) VALUE SPACES.
       01 WS-FIRST-ALLERGY PIC X VALUE 'Y'.

       01 TBL-SZ PIC 9 VALUE 8.
       01 ALLERGY-TABLE-INITIAL.
          03 FILLER PIC X(16) VALUE 'eggs        N001'.
          03 FILLER PIC X(16) VALUE 'peanuts     N002'.
          03 FILLER PIC X(16) VALUE 'shellfish   N004'.
          03 FILLER PIC X(16) VALUE 'strawberriesN008'.
          03 FILLER PIC X(16) VALUE 'tomatoes    N016'.
          03 FILLER PIC X(16) VALUE 'chocolate   N032'.
          03 FILLER PIC X(16) VALUE 'pollen      N064'.
          03 FILLER PIC X(16) VALUE 'cats        N128'.
      
       01 ALLERGY-TABLE REDEFINES ALLERGY-TABLE-INITIAL.
         03 CONTENTS OCCURS 8 TIMES INDEXED BY A-IDX.
            05 ALLERGY-TYPE PIC X(12).
            05 IS-ALLERGIC  PIC X. 
            05 ALLERGY-VAL  PIC 999.
   
       PROCEDURE DIVISION.
       INITIALIZE-TABLE SECTION.
           COMPUTE WS-SCORE = FUNCTION MOD(WS-SCORE 256)
           PERFORM VARYING A-IDX FROM TBL-SZ BY -1 UNTIL A-IDX < 1
               IF  WS-SCORE NOT EQUAL 0 AND
                   ALLERGY-VAL OF CONTENTS(A-IDX) <= WS-SCORE
                   SUBTRACT ALLERGY-VAL OF CONTENTS(A-IDX) FROM WS-SCORE
                   MOVE 'Y' TO IS-ALLERGIC OF CONTENTS(A-IDX)
               ELSE
                   MOVE 'N' TO IS-ALLERGIC OF CONTENTS(A-IDX)
               END-IF
           END-PERFORM.
       EXIT.
      
       ALLERGIC-TO SECTION.
           PERFORM INITIALIZE-TABLE
           SEARCH CONTENTS VARYING A-IDX
               WHEN FUNCTION TRIM (ALLERGY-TYPE OF
                                   CONTENTS(A-IDX) TRAILING) = WS-ITEM
                   MOVE IS-ALLERGIC OF CONTENTS(A-IDX) TO WS-RESULT
           END-SEARCH
           EXIT.

       LIST-ALLERGENS SECTION.
           PERFORM INITIALIZE-TABLE
           INITIALIZE WS-RESULT-LIST
           PERFORM VARYING A-IDX FROM 1 BY 1 UNTIL A-IDX > TBL-SZ
               MOVE ALLERGY-TYPE OF CONTENTS(A-IDX) TO WS-STR-BUFFER
               IF  IS-ALLERGIC OF CONTENTS(A-IDX) = 'Y' AND
                   WS-FIRST-ALLERGY = 'Y'
                   MOVE WS-STR-BUFFER TO WS-RESULT-LIST
                   MOVE 'N' TO WS-FIRST-ALLERGY
               ELSE IF IS-ALLERGIC OF CONTENTS(A-IDX) = 'Y'
                        MOVE WS-RESULT-LIST TO WS-STR-BUFFER
                        STRING WS-STR-BUFFER ',' ALLERGY-TYPE OF
                               CONTENTS(A-IDX) 
                               DELIMITED BY SPACE
                               INTO WS-RESULT-LIST
                        END-STRING
                    END-IF
               END-IF    
           END-PERFORM
           MOVE 'Y' TO WS-FIRST-ALLERGY
           EXIT.