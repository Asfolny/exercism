class Badge {
    public String print(Integer id, String name, String department) {
        var sb = new StringBuilder();
        if (department == null) {
            department = "owner";
        }

        if (id != null) {
            sb.append(String.format("[%d] - ", id));
        }

        sb.append(String.format("%s - ", name));
        sb.append(String.format("%s", department.toUpperCase()));
        return sb.toString();
    }
}
