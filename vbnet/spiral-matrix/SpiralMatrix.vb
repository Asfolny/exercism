Imports System

Public Class SpiralMatrix
    Public Shared Function GetMatrix(ByVal size As Integer) As Integer(,)
        Dim matrix(size - 1, size - 1) As Integer
        Dim x = -1
        Dim y = 0
        Dim dx = 1
        Dim dy = 0
        Dim steps = size
        Dim n = 1
        While 0 < steps
          For s = 0 To steps - 1
            x += dx
            y += dy
      
            matrix(y, x) = n
            n += 1
          Next

          Dim t = dx
          dx = -dy
          dy = t
          if dx = 0 then
            steps -= 1
          end if
        End While
    
        Return matrix
    End Function
End Class