       IDENTIFICATION DIVISION.
       PROGRAM-ID. rotational-cipher.
       DATA DIVISION.
       WORKING-STORAGE SECTION.
       01 WS-KEY PIC 9(2).
       01 WS-TEXT PIC X(128).
       01 WS-CIPHER PIC X(128).
       01 WS-ALPHA-LOWER PIC X(26) VALUE 'abcdefghijklmnopqrstuvwxyz'.
       01 WS-ALPHA-UPPER PIC X(26) VALUE 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.
       01 WS-DOUBLE-UPPER PIC X(52) 
        VALUE 'ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ'.

       PROCEDURE DIVISION.
       ROTATIONAL-CIPHER.
        INITIALIZE WS-CIPHER.
        INSPECT WS-TEXT CONVERTING WS-ALPHA-LOWER TO WS-ALPHA-UPPER.
        ADD 1 TO WS-KEY.
        INSPECT WS-TEXT CONVERTING WS-ALPHA-UPPER TO 
          WS-DOUBLE-UPPER(WS-KEY:26).
        MOVE WS-TEXT TO WS-CIPHER.