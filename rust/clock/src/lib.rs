use std::fmt;

#[derive(Debug, PartialEq)]
pub struct Clock {
    hours: i32,
    minutes: i32
}

impl fmt::Display for Clock {
    fn fmt(&self, f: &mut fmt::Formatter<'_>) -> fmt::Result {
        write!(f, "{:02}:{:02}", self.hours, self.minutes)
    }
}

impl Clock {
    fn normalize(&self) -> Self {
        let minutes: i32 = self.minutes.rem_euclid(60);
        let mut hours: i32 = self.hours;
        
        if minutes != self.minutes {
            hours += self.minutes.div_euclid(60);
        }

        Clock { hours: hours.rem_euclid(24), minutes }
    }
    
    pub fn new(hours: i32, minutes: i32) -> Self {
        let initial = Clock { hours, minutes };
        initial.normalize()
    }

    pub fn add_minutes(&self, minutes: i32) -> Self {
        let passed_hours = minutes / 60;
        let mut hours = self.hours + passed_hours;
        let mut minutes = self.minutes + (minutes - passed_hours * 60);
        
        let new_clock = Clock { hours, minutes };

        new_clock.normalize()
    }
}
