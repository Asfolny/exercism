class PascalsTriangle {
  rows(int number) {
    if (number < 1) {
      return [];
    }

    var res = [];

    for (int i = 0; i < number; i++) {
      var len = i+1;
      var row = [];

      for (int j = 0; j < len; j++) {
        var p = 0;

        try {
          p += res[i-1][j-1] as int;
          p += res[i-1][j] as int;
        } catch (_) {
          if (p == 0) {
            p = 1;
          }
        }

        row.add(p);
      }

      res.add(row);
    }

    return res;
  }
}
