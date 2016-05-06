/** License not specified yet**/
package main;

import java.util.ArrayList;
import java.util.LinkedList;
import java.util.Queue;

/**
 * <p>TreeNode is used to visualize the tree on the Parse Tree. 
 *     It's used to find the 2nd constituent (NP,VP or other thing)</p>
 * @author alief refactored by haryoaw
 * @version 19-04-2016
 */
public class TreeNode {
  private String label;
  private String value;
  private TreeNode parent;
  private ArrayList<TreeNode> childs = new ArrayList<>();
  private int level = -1;

  /**
   * add new node to the tree
   * @return tree with node that's added
   */
  public TreeNode addNode() {
    TreeNode node = new TreeNode();
    childs.add(node);
    return node;
  }

  /**
   * Construct the tree with the given Parse Tree
   * @param parseTree given parse tree with JSON format
   */
  public void construct(String parseTree) {
    // contoh input (ROOT\n  (NP (NNP Privacy) (NNP Policy)))
    String tag = "";
    TreeNode head = this;

    for (int i = 0; i < parseTree.length(); i++) {
      char currentChar = parseTree.charAt(i);

      if (currentChar == '(') {
        TreeNode node = head.addNode();
        node.parent = head;
        head = node;
        head.level = node.parent.level+1;

      } else if (currentChar == ' ' && tag.length() > 0 ) {
        if (head.label == null) {
          head.label = tag;
        } else {
          head.value = tag;
        }
        tag = "";
      } else if (currentChar == ')') {
        if (head.value == null) {
          head.value = tag;
        }
        head = head.parent;
      } else if (currentChar != ' ') {
        tag += currentChar;
      }
    }
  }

  /**
   * Do level order and print the result
   */
  public void getLevelOrder() {
    Queue queue = new LinkedList<TreeNode>();
    queue.add(this);
    while(!queue.isEmpty()) {
      TreeNode thisNode = (TreeNode) queue.poll();
      for (TreeNode node : thisNode.childs) {
        queue.add(node);
      }
//      System.out.println(thisNode);
    }
  }

  /**
   * Get the node on level 2 tree
   * @return the value of node on lv 2.
   */
  public String getChildrenOfLv2() {
    String result = "";
    Queue queue = new LinkedList<TreeNode>();
    queue.add(this);
    while(!queue.isEmpty()) {
      TreeNode thisNode = (TreeNode) queue.poll();
      for (TreeNode node : thisNode.childs) {
        if (node.level == 2) {
          result += "{";
          String nodeVal = node.getLeaves(node);
          if (nodeVal.contains("/PERSON")) {
            nodeVal = nodeVal.replace("/PERSON", "");
            result += nodeVal;
            result += "}/PERSON ";
          } else {
            result += nodeVal;
            result += "}/"+node.label+" ";
          }
        }
        queue.add(node);
      }
      if (thisNode.level > 2) {
        return result;
      }
    }
    return result;
  }

  /**
   * Method ini akan mendapatkan semua leaf dari sebuah tree.
   * @param startNode Root node yang akan dicari nilai-nilai leafnya
   * @return      <code>String</code> dari nilai-nilai leaf yang di append
   * @see       SentenceTagger
   * @since      1.0
   */
  public String getLeaves(TreeNode startNode) {
    String result = "";
    Queue queue = new LinkedList<TreeNode>();
    queue.add(startNode);

    while(!queue.isEmpty()) {
      TreeNode thisNode = (TreeNode) queue.poll();
      for (TreeNode node : thisNode.childs) {
        queue.add(node);
      }
      if (thisNode.childs.size() == 0) {
        result += thisNode.value +" ";
      }
    }
    return result;
  }

  @Override
  public String toString() {
    return "label:" + this.label + ", value:" + this.value+", level:" + this.level;
  }

}
