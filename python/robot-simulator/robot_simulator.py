EAST = 'east'
NORTH = 'north'
WEST = 'west'
SOUTH = 'south'


class Robot:
    def __init__(self, direction=NORTH, x_pos=0, y_pos=0):
        self.direction = direction
        self.coordinates = (x_pos, y_pos)

    def move(self, actions):
        for action in list(actions):
            match action:
                case 'L':
                    self.__left()
                case 'R':
                    self.__right()
                case 'A':
                    self.__advance()

    def __left(self):
        match self.direction:
            case 'north':
                self.direction = WEST
            case 'east':
                self.direction = NORTH
            case 'south':
                self.direction = EAST
            case 'west':
                self.direction = SOUTH

    def __right(self):
        match self.direction:
            case 'north':
                self.direction = EAST
            case 'east':
                self.direction = SOUTH
            case 'south':
                self.direction = WEST
            case 'west':
                self.direction = NORTH

    def __advance(self):
        match self.direction:
            case 'north':
                self.coordinates = (self.coordinates[0], self.coordinates[1] + 1)
            case 'east':
                self.coordinates = (self.coordinates[0] + 1 , self.coordinates[1])
            case 'south':
                self.coordinates = (self.coordinates[0], self.coordinates[1] - 1)
            case 'west':
                self.coordinates = (self.coordinates[0] - 1, self.coordinates[1])