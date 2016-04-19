package main;

import java.io.*;
import java.util.*;
import java.util.regex.Pattern;

import edu.stanford.nlp.ie.AbstractSequenceClassifier;
import edu.stanford.nlp.ie.crf.CRFClassifier;
import edu.stanford.nlp.ling.CoreAnnotations;
import edu.stanford.nlp.ling.CoreLabel;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

import edu.stanford.nlp.pipeline.*;

/*
 * @author Alief
 */
public class SentenceIdentifier{

    String tempFilename = "json.txt";
    PrintWriter out;
    PrintWriter toFile;
    // Writer w ;
    Properties props;
    StanfordCoreNLP pipeline;
    AbstractSequenceClassifier classifier;

    public SentenceIdentifier(){
        File statText = new File("lala2.txt");
        try{
            this.out = new PrintWriter(System.out);
            this.toFile = new PrintWriter(tempFilename,"UTF-8");
        }catch(Exception e){
            System.out.println("IO Error");
        }
        loadModels();
    }

    public static void main(String[] args)throws Exception{
    	System.out.println("Test Sentence Identifier");
        SentenceIdentifier sen = new SentenceIdentifier();
        String result = sen.identify("Kosgi Santosh sent an email to Stanford University. He didn't get a reply. - Alief");
        System.out.println(result);
        System.out.println(sen.addNer("You have to expect things of yourself before you can do them. — Michael Jordan"));
    }

    public String partialIdentify(String sentences){
    	// save sentences to file
    	String[] partOfSentences = sentences.split("\n");
    	String result = "";
    	// loop
    	for(int ii = 0 ; ii < partOfSentences.length ; ii++){
    		sentences = partOfSentences[ii];
    		String temp = identify(sentences);
//    		if(temp.split(" ").length>5){
    			result += temp;
//    		}
    	}
    	System.out.println(result);
    	// save result
    	return result;
    }

    private String identify(String sentences){
    	
        String result = "";
        Annotation annotation = new Annotation(sentences);
        // run all the selected Annotators on this text
        pipeline.annotate(annotation);
        try{
        	toFile = new PrintWriter(tempFilename);
        	toFile.print("");
        	
            pipeline.jsonPrint(annotation,toFile);
            JSONParser parser = new JSONParser();

            Object obj = parser.parse(new FileReader(tempFilename));

            JSONObject jsonObject = (JSONObject) obj;

            JSONArray companyList = (JSONArray) jsonObject.get("sentences");
            Iterator<JSONObject> iterator = companyList.iterator();
            while (iterator.hasNext()) {
                String parseTree = (String) iterator.next().get("parse");
                // System.out.println(parseTree);
        		TreeNode node = new TreeNode();
        		node.construct(parseTree);
        		result += node.getChildrenOfLv2();
                result += "\r";
            }
            result += "\n";
            // w.close();
        }catch(Exception e){
            System.out.println("Error");
            e.printStackTrace();
        }

        return result;
    }

    /**
     * Method ini akan mengembalikan tag PEOPLE untuk kata yang berupa nama orang
     * @param sentences beberapa kalimat yang ingin ditag
     * @return kata sudah tertag
     */
    public String addNer(String sentences){
        List<List<CoreLabel>> out = classifier.classify(sentences);
        String wordReturned = "";
        final  Pattern FILTERS = Pattern.compile("(}|\\\\|n't|'m|VP|NP|S|.)");

        for (List<CoreLabel> sentence : out){
            for(int i = 0; i < sentence.size(); i++) {
                CoreLabel word = sentence.get(i);

                String tagNer = word.get(CoreAnnotations.AnswerAnnotation.class);
                if (tagNer.equalsIgnoreCase("PERSON"))
                    wordReturned += word.originalText() + '/' + tagNer; //Hanya untuk /PERSON
                else
                    wordReturned += word.originalText();

                //Klo berikutnya bukan {, \\ n't, 'm pake spasi
                if(i < sentence.size()-1) {
                    String nextWord = sentence.get(i + 1).originalText();
                    if (!FILTERS.matcher(nextWord).matches() && !word.originalText().equals("{")) {
                        wordReturned += " ";
                    }
                }
            }
            wordReturned += "\n";
        }
        return wordReturned;
    }


    private void loadModels(){

        // Add in sentiment
    	this.props =  new Properties();
        this.props.setProperty("ner.useSUTime","0");
        this.props.put("annotators", "tokenize, ssplit, pos, lemma, parse");
        this.props.put("pos.model", "model/english-left3words-distsim.tagger");
        this.pipeline = new StanfordCoreNLP(props);
        System.err.println("Loading Model Done");
    }


   
}