namespace import ::tcl::mathfunc::*
namespace import ::tcl::mathop::+

namespace eval dnd {
    namespace export character ability modifier
    namespace ensemble create

    proc modifier {score} {
        return [expr [expr $score - 10] / 2]
    }

    proc randAbilityPoint {} {
        set a [rand]
        set a [int [expr $a * 100]]
        set a [expr $a % 5]
        set a [expr $a + 1]
        return $a
    }

    proc ladd {l} {
        set total 0
        foreach nxt $l {
            incr total $nxt
        }
        return $total
    }
    
    proc ability {} {
        set nums [eval randAbilityPoint]
        lappend nums [eval randAbilityPoint]
        lappend nums [eval randAbilityPoint]
        lappend nums [eval randAbilityPoint]
        set nums [lsort -integer $nums]
        set nums [lrange $nums 1 3]
        return [::tcl::mathop::+ {*}$nums]
    }

    proc character {} {
        set con [eval ability]
        return [dict create \
            charisma [eval ability] \
            constitution $con \
            dexterity [eval ability] \
            intelligence [eval ability] \
            strength [eval ability] \
            wisdom [eval ability] \
            hitpoints [expr [eval modifier $con] + 10]
        ]
    }
}
