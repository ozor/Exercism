class Matrix:
    def __init__(self, matrix_string):
        self.matrix = []
        rows = matrix_string.split("\n")
        for row in rows:
            columns = row.split()
            parsed = []
            for column in columns:
                parsed.append(int(column))
            self.matrix.append(parsed)

    def row(self, index):
        return self.matrix[index-1]

    def column(self, index):
        column = []
        for row in self.matrix:
            column.append(row[index-1])
        return column
