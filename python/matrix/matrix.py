class Matrix:
    matrix: str

    def __init__(self, matrix_string: str) -> None:
        self.matrix = [[int(column) for column in rows.split()] for rows in matrix_string.splitlines()]

    def row(self, index: int) -> list:
        return self.matrix[index-1]

    def column(self, index: int) -> list:
        return [row[index-1] for row in self.matrix]
