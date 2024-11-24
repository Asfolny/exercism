import string

class PhoneNumber:
    def __init__(self, number):
        number_count = 0
        sanitized_number = ""
        pos = 0

        for n in number:
            if n.isnumeric():
                number_count += 1

            if n.isalpha():
                raise ValueError('letters not permitted')

            if n not in ['(', ')', '.', '-', '+'] and n in list(string.punctuation):
                raise ValueError('punctuations not permitted')

        if number_count > 11:
            raise ValueError('must not be greater than 11 digits')
        if number_count < 10:
            raise ValueError('must not be fewer than 10 digits')

        for n in number[::-1]:
            if pos == 6:
                if n == '0':
                    raise ValueError('exchange code cannot start with zero')
                if n == '1':
                    raise ValueError('exchange code cannot start with one')
            if pos == 9:
                if n == '0':
                    raise ValueError('area code cannot start with zero')
                if n == '1':
                    raise ValueError('area code cannot start with one')

            if n.isnumeric():
                sanitized_number += n
                pos += 1

        sanitized_number = sanitized_number[::-1]

        if pos == 11:
            country = sanitized_number[0]
            sanitized_number = sanitized_number[1:]
            if country != '1':
                raise ValueError('11 digits must start with 1')

        self.number = sanitized_number
        self.area_code = sanitized_number[:3]
        self.exchange = sanitized_number[3:6]
        self.rest = sanitized_number[6:]

    def pretty(self):
        return f"({self.area_code})-{self.exchange}-{self.rest}"
        
