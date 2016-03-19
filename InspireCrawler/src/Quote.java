/**
 * Created by pflarasati on 3/19/16.
 */
public class Quote {

    private int ID;
    private String quote;
    private String author;
    private String category;
    private String source;
    private boolean isManual;
    private String language;


    public Quote(String quote, String author, String source) {
        this.quote = quote;
        this.author = author;
        this.source = source;
    }

    public Quote(int ID, String quote, String author, String category, String source, boolean isManual, String language) {
        this.ID = ID;
        this.quote = quote;
        this.author = author;
        this.category = category;
        this.source = source;
        this.isManual = isManual;
        this.language = language;
    }

    public int getID() {
        return ID;
    }

    public String getQuote() {
        return quote;
    }

    public String getAuthor() {
        return author;
    }

    public String getCategory() {
        return category;
    }

    public String getSource() {
        return source;
    }

    public boolean isManual() {
        return isManual;
    }

    public String getLanguage() {
        return language;
    }

    public void setID(int ID) {
        this.ID = ID;
    }

    public void setQuote(String quote) {
        this.quote = quote;
    }

    public void setAuthor(String author) {
        this.author = author;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public void setSource(String source) {
        this.source = source;
    }

    public void setManual(boolean manual) {
        isManual = manual;
    }

    public void setLanguage(String language) {
        this.language = language;
    }
    
}