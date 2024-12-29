Imports System.Collections.Generic
Imports System.Text.RegularExpressions

Public Module MatchingBrackets
    Public Function IsPaired(ByVal input As String) As Boolean
        input = Regex.Replace(input, "[^(){}\[\]]+", "")
        Dim prevInput As String
        While input <> ""
            prevInput = input
            input = Regex.Replace(input, "\(\)|{}|\[\]", "")
            If prevInput = input Then
                Exit While
            End If
        End While
        If input = "" Then
            Return True
        Else
            Return False
        End If
    End Function

End Module