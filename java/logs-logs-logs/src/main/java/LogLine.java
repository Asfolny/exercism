public class LogLine {
    private LogLevel level;
    private String line;
    
    public LogLine(String logLine) {
        var parts = logLine.split(": ");
        this.line = parts[1];
        switch (parts[0]) {
            case "[TRC]":
                this.level = LogLevel.TRACE;
                break;
            case "[DBG]":
                this.level = LogLevel.DEBUG;
                break;
            case "[INF]":
                this.level = LogLevel.INFO;
                break;
            case "[WRN]":
                this.level = LogLevel.WARNING;
                break;
            case "[ERR]":
                this.level = LogLevel.ERROR;
                break;
            case "[FTL]":
                this.level = LogLevel.FATAL;
                break;
            default:
                this.level = LogLevel.UNKNOWN;
        }
    }

    public LogLevel getLogLevel() {
        return this.level;
    }

    public String getOutputForShortLog() {
        return String.format("%d:%s", this.level.getShortCode(), this.line);
    }
}
