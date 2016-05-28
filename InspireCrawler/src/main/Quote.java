package main;

/**
 * @author pflarasati
 * Created on 3/19/16.
 * Updated on 26/03/2016
 *
 * Class Quote
 * Class ini adalah class yang merepresentasikan bentuk quote yang di-crawl
 * Class ini bertujuan untuk mempermudah pengolah quote yang akan disimpan di database
 *
 */
public class Quote {


    private int ID;
    private String quote;
    private String author;
    private String category;
    private String source;
    private boolean isManual;
    private String language;


    /**
     * Constructor Minimal class Quote
     * @param quote
     * @param author
     * @param source
     */
    public Quote(String quote, String author, String source) {
        this.quote = quote;
        this.author = author;
        this.source = source;
    }

    /**
     * Contructor lengkap class Quote
     * @param ID
     * @param quote
     * @param author
     * @param category
     * @param source
     * @param isManual
     * @param language
     */
    public Quote(int ID, String quote, String author, String category, String source, boolean isManual, String language) {
        this.ID = ID;
        this.quote = quote;
        this.author = author;
        this.category = category;
        this.source = source;
        this.isManual = isManual;
        this.language = language;
    }


    /**
     * Method getID()
     * Method ini digunakan untuk mengambil ID dari sebuah quote
     * @return ID quote (integer)
     */
    public int getID() {
        return ID;
    }

    /**
     * Method getQuote()
     * Method ini digunakan untuk mengambil quote
     * @return quote (String)
     */
    public String getQuote() {
        return quote;
    }

    /**
     * Method getAuthor()
     * Method ini digunakan untuk mengambil penulis dari sebuah quote
     * @return author dari quote (String)
     */
    public String getAuthor() {
        return author;
    }

    /**
     * Method getCategory()
     * Method ini digunakan untuk mengambil kategori dari sebuah quote
     * @return kategori dari quote (String)
     */
    public String getCategory() {
        return category;
    }

    /**
     * Method getSource()
     * Method ini digunakan untuk mengambil kategori dari sebuah quote
     * @return source dari quote (String)
     */
    public String getSource() {
        return source;
    }

    /**
     * Method getisManual()
     * Method ini digunakan untuk mencari tahu apakah quote bukan hasil crawl atau tidak
     * @return nilai apakah quote bukan hasil quote (String)
     */
    public boolean isManual() {
        return isManual;
    }

    /**
     * Method getLanguage()
     * Method ini digunakan untuk mengambil bahasa dari sebuah quote
     * @return nama bahasa dari quote
     */
    public String getLanguage() {
        return language;
    }

    /**
     * Method setID()
     * Method ini digunakan untuk mengubah nilai ID dari sebuah quote
     * @param ID
     */
    public void setID(int ID) {
        this.ID = ID;
    }

    /**
     * Method setQuote()
     * Method ini digunakan untuk mengubah isi quote
     * @param quote
     */
    public void setQuote(String quote) {
        this.quote = quote;
    }

    /**
     * Method setAuthor()
     * Method ini digunakan untuk mengubah penulis dari sebuah quote
     * @param author
     */
    public void setAuthor(String author) {
        this.author = author;
    }


    /**
     * Method setCategory()
     * Method ini digunakan untuk mengubah  kategori dari sebuah quote
     * @param category
     */
    public void setCategory(String category) {
        this.category = category;
    }

    /**
     * Method setSource()
     * Method ini digunakan untuk mengubah sumber dari sebuah quote
     * @param source
     */
    public void setSource(String source) {
        this.source = source;
    }

    /**
     * Method setManual()
     * Method ini digunakan untuk mengubah nilai apakah quote bukan hasil quote dari sebuah quote
     * @param manual
     */
    public void setManual(boolean manual) {
        isManual = manual;
    }


    /**
     * Method setID()
     * Method ini digunakan untuk mengubah bahasa dari sebuah quote
     * @param language
     */
    public void setLanguage(String language) {
        this.language = language;
    }

    @Override
    public boolean equals(Object obj) {

        Quote other = (Quote) obj;
        // For now we assume author , id , source , quote that will be used
        if(this.isManual == other.isManual
                && this.getAuthor().equals(other.getAuthor())
                && this.getID() == other.getID()
                && this.getSource().equals(other.getSource())
                && this.getQuote().equals(other.getQuote())){
            return true;
        }
        return false;
    }

    public String toString(){
        return "id = " + this.ID
                + " quote = " + this.quote
                + " author = " + this.author
                + " category = " + this.category
                + " source = " + this.source
                + " ismanual = " + this.isManual
                + " language = " + this.language;
    }
}
