export const isArmstrongNumber = (num) => {
  let arm = 0;
  const numLength = num.toString().length
 
  for (const part of num.toString()) {
    arm += parseInt(part) ** numLength
  }

  return num == arm
}
